<?php

	class Logout
	{

		static public function signOutUser()
		{
			DatabaseFunctions::deleteData();
		}
	}

 ?>