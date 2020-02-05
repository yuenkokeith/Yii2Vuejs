<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * Base controller
 */
class BaseController extends Controller
{
    public $accessMode = 'edit';
    public $numberOfNotification = 0;
    public $company_id = '';
    public $filterType = '';

    public function beforeAction($action)
    {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        return true; // or false to not run the action
    }

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        // your custom code here
        return $result;
    }
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    
    public function noAccess() {
        return $this->redirect([
            'site/noaccess',
        ]);
    }

    public function saveToDB($model, $mode=true) {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($model->save($mode)) {
                $transaction->commit();
                return true;
            } else {
				$transaction->rollBack();
				return false;
			}
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

    public function pprint_r($arr) {
        echo "<pre>";
            print_r($arr);
        echo "</pre>";
    }

}
