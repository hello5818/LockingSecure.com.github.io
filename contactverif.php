<?php
	require 'vendor/autoload.php';
	use \Mailjet\Resources;
	
	$mj = new \Mailjet\Client('276cd904d46457b0f77d2936a2144f68','87eb7a099f166087798f9f78cdbcbd5f',true,['version' => 'v3.1']);
	
	if(!empty($_GET['nom']) && !empty($_GET['email']) && !empty($_GET['message'])){  // Empty vérifie si la case est vide ou non
		$nom = htmlspecialchars($_GET['nom']);
		$email = htmlspecialchars($_GET['email']);
		$message = htmlspecialchars($_GET['message']);
	
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			 $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "pauljlivet@gmail.com",
          'Name' => "Locking Secure Contact"
        ],
        'To' => [
          [
            'Email' => "pauljlivet@gmail.com",
            'Name' => "Locking Secure Contact"
          ]
        ],
        'Subject' => "Message",
        'TextPart' => "$email,$message",
        
        
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
  echo "Email envoyé !";
	
	}else {
		echo"Email non valide";
	}
		
	}else{
	header('Location:Formulairecontact.php');
	die(); // ou exit;
	}

?>