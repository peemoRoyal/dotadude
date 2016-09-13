<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;

/**
 * ReplayData Controller
 *
 * @property \App\Model\Table\ReplayDataTable $ReplayData
 */
class ReplayDataController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->request->data;
        // Check if replay_file and upload it
        if (!empty($this->request->data['replay_file'])) {
            $file = $this->request->data['replay_file'];
            $replayPath = WWW_ROOT . '/upload/replay_files/';
            $jarPath = WWW_ROOT . '/java/dem-to-json.jar';
            $matchId =  explode(".", $file['name'], 2)[0];
            $ext = explode(".", $file['name'], 2)[1];
            //Check if extension is allowed
            if ($ext == 'dem') {
                $uploadSuccess = move_uploaded_file($file['tmp_name'], $replayPath . $file['name']);
                if ($uploadSuccess) {
                    $this->set('uploadFinished', true);
                    $this->Flash->success(__('Replay successfully uploaded'));
                    return $this->redirect([
                        'action' => 'parseReplay',
                        $matchId
                    ]);
                } else {
                    $this->Flash->error(__('Replay could not be uploaded'));
                }
            } else {
                $this->Flash->error(__('Only .dem files allowed'));
            }

        }
        $this->set(compact('data'));
    }

/**
 * undocumented function summary
 *
 * Undocumented function long description
 * @TODO wenn match schon in DB redirect ohne upload
 * @param type var Description
 * @return void
 */
    public function parseReplay($matchId = '')
    {
        if ($matchId != '') {
            $replayFilePath = WWW_ROOT . 'upload/replay_files/' . $matchId . '.dem';
            $jarPath = WWW_ROOT . 'java/dem-to-json.jar';
            $jsonFilePath = WWW_ROOT . 'upload/replay_files/' . $matchId . '.json';
            $pyPath = WWW_ROOT . 'python/goldXp.py';

            //Execute .jar to parse .dem file into json
            $output_java = shell_exec('java -jar' . ' ' . $jarPath . ' ' . $replayFilePath . ' ' .  $jsonFilePath);

            $jsonDecoded = json_decode(file_get_contents($jsonFilePath), true);

            $query = $this->ReplayData->query()->insert(['match_id', 'replay_file'])
                ->values([
                    'replay_file' => $jsonDecoded,
                    'match_id' => $matchId
            ])->execute();

            if($query) {
                $this->Flash->success(__('Replay successfully parsed'));
                // Delete Files
                $tmpRepFile = new File($replayFilePath);
                $tmpRepFile->delete();
                $tmpJsonFile = new File($jsonFilePath);
                $tmpJsonFile->delete();
                //execute Pythons scripts
                $output_python = shell_exec('python ' . $pyPath . ' ' . $matchId);
                //Redirect to Replay Views
                return $this->redirect([
                    'controller' => 'GoldXp',
                    'action' => 'index',
                    $matchId,
                ]);

            } else {
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
        }
    }
}
