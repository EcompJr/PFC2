<?php
header('Content-type: text/html; charset=utf-8');

if(!isset($_SESSION)){
    session_start();
}
class MainController{

    //Loads page content
    protected function loadContent($filename,$data = array()){
        extract($data);
        include ABSOLUTE_PATH.'/views/pages/'.$filename.'.php';
    }

    //Deny access
    protected function accessDenied(){
        $c= new ErrorController();
        $c->accessDenied();
    }
    /**
    * Loads the header
    */
    protected function loadHeader(){
        include ABSOLUTE_PATH.'/views/pages/header.php';
    }

    /**
    * Loads the footer
    */
    protected function loadFooter(){
        include ABSOLUTE_PATH.'/views/pages/footer.php';
    }
    //Loads CSS dependencies
    protected function loadCSS(){
        echo '<link rel="stylesheet" type ="text/css" href='.VIEW_BASE."/assets/css/estilo.css".'>';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">';
        echo '<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">';
        echo '<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400" rel="stylesheet"> ';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        echo ' <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>';
       echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">';
    
    }

    //Loads Javascript dependencies
    protected function loadJavascript(){
        echo '<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
		echo ('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>');
		echo ('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>');
        echo '<script src="'.VIEW_BASE.'assets/js/jquery.mask.min.js"></script>';      
        echo '<script src='.VIEW_BASE.'assets/js/common.js></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>';
        echo '<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>';
 



    }


    /**
    * This method makes a path to view dependencies
    */
    protected function path($path){
        echo VIEW_BASE.$path;
    }

    /**
    * This method redirects the user to another page
    */
    protected function redirect($url){
        echo "<script>location.href='".ROOT_URL.$url."'</script>";
    }

    //Verify if member is admin
    protected function isAdmin(){
        if($this->isLogged()){
            if($_SESSION['member_type'] == "director" || $_SESSION['member_type'] == "admin"){
                return true;
            }else{
                $this->accessDenied();
                return false;
            }
        }else{
            $this->redirect('login',array());
        } 
    }

    //Verify if member is logged
    protected function isLogged(){
        if(isset($_SESSION['isLogged']) && $_SESSION['isLogged']){
            return true;
        }else{
            $this->redirect('login',array());
            return false;
        }
    }
}