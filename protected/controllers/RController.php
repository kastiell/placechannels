<?php

class RController extends Controller
{

	public function actionIndex()
	{
        $this->layout = 'empty';
		$this->render('test');
	}
}
