<?php

class SiteController
{
	public function actionIndex() {

		require_once (ROOT . '/views/site/index.php');
		return true;
	}
	public function actionSearch()
	{
		$curl = new Curl();
		$phonebook = $curl->search();

		require_once (ROOT . '/views/site/phonebook.php');
		return true;
	}
	public function actionPhonebook()
	{
		$curl = new Curl();
		$phonebook = $curl->get();

		require_once (ROOT . '/views/site/phonebook.php');
		return true;
	}

	public function actionEdit($id)
	{
		$curl = new Curl();
		$phonebook = $curl->updateData($id);
		$response = $curl->update($id);

		require_once (ROOT . '/views/site/edit.php');
		return true;
	}

	public function actionCreate()
	{
		$curl = new Curl();
		$response = $curl->create();

		require_once (ROOT . '/views/site/create.php');
		return true;
	}

	public function actionDelete($id)
	{
		$curl = new Curl();
		$response = $curl->delete($id);

		require_once (ROOT . '/views/site/create.php');
		return true;
	}

}