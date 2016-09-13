<?php
namespace App\Controller;

use App\Controller\AppController;
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
        phpinfo();
        // $link = pg_connect("dbname=postgres user=petergleixner password=");
        // $result = pg_exec($link, "select * from replays");
        // debug($result);

        $data = $this->request->data;

        // Check if replay_file and upload it
        if (!empty($this->request->data['replay_file'])) {
            $file = $this->request->data['replay_file'];
            $replayPath = WWW_ROOT . '/upload/replay_files/';
            $jarPath = WWW_ROOT . '/java/dem-to-json.jar';

            // $newFileName = 'uid_' . time() . '_' . $file['name'];
            // for testing:
            $newFileName = 'uid_' . $file['name'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);

            //Check if extension is allowed
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            if ($ext == 'dem') {
                $uploadSuccess = move_uploaded_file($file['tmp_name'], $replayPath . $newFileName);
                if ($uploadSuccess) {
                    $this->set('uploadFinished', true);
                    $this->Flash->success(__('Replay successfully uploaded'));
                    return $this->redirect([
                        'action' => 'parseReplay',
                        $newFileName
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
 *
 * @param type var Description
 * @return {11:return type}
 */
    public function parseReplay($filename = '')
    {
        if ($filename != '') {
            $replayPath = WWW_ROOT . 'upload/replay_files/'.$filename;
            $jarPath = WWW_ROOT . 'java/dem-to-json.jar';
            $outPath = WWW_ROOT . 'upload/replay_files/';
            $jsonPath = WWW_ROOT . 'upload/replay_files/test_full_01.json';

            // $jsonPath = WWW_ROOT . 'upload/replay_files/test_full_01.json';
            $json = file_get_contents($jsonPath);
            $jsonDecoded = json_decode($json, true);

            //Execute .jar to parse .dem file into json
            $output = shell_exec('java -jar' . ' ' . $jarPath . ' ' . $replayPath . ' ' .  $outPath);

            foreach ($jsonDecoded as $jdec) {
                    echo ($jdec['tick'].' ');
            }

            // $query = $this->ReplayData->query();
            // $success = $query->insert(['jdoc'])
            //     ->values([
            //         'jdoc' => $jsonDecoded
            //     ])->execute();

// TODO GET ID OF LAST ADDED
            $replayDataId = 39;
        //     if($success) {
        //         $this->Flash->success(__('Replay successfully parsed'));
        //         // return $this->redirect([
        //         //     'action' => 'view',
        //         //     $replayDataId,
        //         // ]);
        //     }
        // } else {
        //     return $this->redirect([
        //         'action' => 'index'
        //     ]);

        }
    }

    /**
     * View method
     *
     * @param string|null $id Replay Data id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    $replayData = $this->ReplayData->get($id, [
        'contain' => []
    ]);

		// SELECT * FROM replay_data WHERE JSON_EXTRACT(jdoc, '$.data.hero_name') = "CDOTA_Unit_Hero_EarthSpassti" AND id = 20;
        $heroNamesQuery = $this->ReplayData->find();
		$expr = $heroNamesQuery->newExpr()->add("JSON_EXTRACT(jdoc, '$.data.hero_name')");
		$heroNamesQuery->where([$expr => 'CDOTA_Unit_Hero_EarthSpassti']);
		debug($heroNamesQuery->first());exit;
        //->where(['JSON_EXTRACT(jdoc, "$.data.hero_name")' => 'pudge']);

        // QUERYSTRING
        // $queryString = 'SELECT * FROM "replay_data" WHERE id=39;';

        debug($queryString);

        $arrayTemp1 = $this->ReplayData->query($queryString);

        debug($arrayTemp1);
        foreach ($arrayTemp1 as $entity) {
            // debug($entity);
        }

        // debug($heroNamesQuery);
        $this->set('replayData', $replayData);
        $this->set('replayData', $replayData);

    }

}
