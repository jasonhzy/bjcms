<?php
		unset($_SESSION["account"]);
		
		unset($_SESSION["addons_check"]);
		unset($_SESSION);
		header("location:".create_url('site', array('name' => 'public','do' => 'index')));