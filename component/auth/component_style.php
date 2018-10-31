<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

        <script src="../assets/js/modernizr.min.js"></script>
        <style type="text/css" media="screen">
        	.loader-auth {
			  display: block;
			  position: fixed;
			  width: 100%;
			  height: 100%;
			  top:0;
			  background-color: #0006;
			  z-index: 999999;
			  display: none;
			}
			.loader-auth div {
			  position: absolute;
			  border: 4px solid #fff;
			  opacity: 1;
			  border-radius: 50%;
			  margin: 20% 48% 20% 48%;
			  animation: loader-auth 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
			}
			.loader-auth div:nth-child(2) {
			  animation-delay: -0.5s;
			}
			@keyframes loader-auth {
			  0% {
			    top: 28px;
			    left: 28px;
			    width: 0;
			    height: 0;
			    opacity: 1;
			  }
			  100% {
			    top: -1px;
			    left: -1px;
			    width: 58px;
			    height: 58px;
			    opacity: 0;
			  }
			}
        </style>