<?php

namespace backend\controllers;

use Yii;
use app\models\members;
use app\models\membersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MembersController implements the CRUD actions for members model.
 */
class MembersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all members models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new membersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single members model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new members();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mem_mid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mem_mid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing members model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = members::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionLoadmembers()
	{
		$members = Members::find()->asArray()->all();
		echo json_encode($members);
	}
	
	public function actionInsert()
	{
	    $id = '';
	    $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
	    $email = $_REQUEST['email'];
	    $mobile = $_REQUEST['mobile'];
	    $city = $_REQUEST['city'];
	    $state = $_REQUEST['state'];
	    $country = $_REQUEST['country'];
	    $postalcode = $_REQUEST['postalcode'];

        $insert = "INSERT INTO members (mem_first_name,mem_last_name,mem_email,mem_mobile,mem_city,mem_state,mem_country,mem_postal_code) VALUES ('$firstname','$lastname','$email','$mobile','$city','$state','$country','$postalcode')";
        //insertdata
        Yii::$app->db->createCommand($insert)->execute();
        $data = array();
        $data_array['result'] = "success";
        array_push($data,$data_array);
        echo json_encode($data);


		
	}

    public function actionEditmembers()
    {
        $id = $_REQUEST['id'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $country = $_REQUEST['country'];
        $postalcode = $_REQUEST['postalcode'];

        Yii::$app->db->createCommand()->update('members', ['mem_first_name'=>$firstname,'mem_last_name' =>$lastname, 'mem_email'=>$email,'mem_mobile'=>$mobile,'mem_city'=>$city,'mem_state'=>$state,'mem_country'=>$country,'mem_postal_code'=>$postalcode], ['mem_mid' =>$id])->execute();
        //insertdata
        $data = array();
        $data_array['result'] = "success";
        array_push($data,$data_array);
        echo json_encode($data);



    }

    public function actionDeletemember()
    {
        $id = $_REQUEST['id'];
        $delete = "DELETE FROM members WHERE mem_mid='$id'";
        Yii::$app->db->createCommand($delete)->execute();
        $members = Members::find()->asArray()->all();
        echo json_encode($members);
    }

    public function actionSearchmembers()
    {
        $name = $_REQUEST['name'];

        $members = Members::find()->asArray()->andFilterWhere(['like', 'mem_first_name', '%'.$name.'%', false])->all();
        echo json_encode($members);
    }
}
