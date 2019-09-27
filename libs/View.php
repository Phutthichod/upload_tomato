<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name, $noInclude = false)
	{
		// require 'http://localhost/user_plant/views/head.php';
		// if ($noInclude == true) {
		
			
		
			if ($noInclude == true) {
				require 'views/' . $name . '.php';	
			}
			else {
				require 'views/head.php';
				require 'views/' . $name . '.php';
		
			}



			// echo '<!DOCTYPE html>
			// <html lang="en">
			//   <head>
			// 	<!-- Required meta tags -->
			// 	<meta charset="utf-8">
			// 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			// 	<title>plan_manage</title>
			// 	<!-- header -->'
			// 	require 'http://localhost/user_plant/views/public/header.php';
			//  echo' </head>
			//   <body>
			// 	<div class="container-scroller">
			// 	  <!-- partial:partials/_navbar.html -->'
			// 	  require 'http://localhost/user_plant/views/public/navbar.php';
			// echo	  '<!-- partial -->
			// 		<div class="container-fluid page-body-wrapper'>
			// 		<!-- partial:partials/_sidebar.html -->''
			// 		require 'http://localhost/user_plant/views/public/sidebar.php';
			// echo 		'<!-- partial -->
			// 			<div class="main-panel">
			// 				<div class="content-wrapper">
			// 				  <div class="page-header">
			// 					<h3 class="page-title"> user plant </h3>>
			// 				  </div>'
			// 				//   require 'http://localhost/user_plant/views/' . $name . '.php';
			// 	echo'			</div>
			// 				<!-- content-wrapper ends -->
			// 				<!-- partial:partials/_footer.html -->'
			// 				require 'http://localhost/user_plant/views/public/footer.php';
			// 	echo 			'<!-- partial -->
			// 			</div>
			// 			<!-- main-panel ends -->
			// 		</div>
			// 	  <!-- page-body-wrapper ends -->
			// 	</div>
			// 	<!-- container-scroller -->
			//   </body>'
			  
		// }
		// else {
		// 	echo '<body >
		// 			<div>';
		// 	// require 'http://localhost/user_plant/views/header/navbar.php';
		
		// 	// require 'http://localhost/user_plant/views/header/sidebar.php';	
		// 	echo ' <div>
        //     <div class="content-wrapper">';
		// 	require 'http://localhost/user_plant/views/' . $name . '.php';
			
			
		// 	echo ' </div>
						
		// 			</div>
					
		// 			</div>
		// 			</body>';
		// }
	}

}