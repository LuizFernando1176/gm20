<?php

include_once './util/corpoLogin.php';
cabeca();
?>
<style>.card{
        opacity: 0.8;
    }
</style>

<body background="img/olinda.jpg"   >
    <div class="container">
        <div class="row justify-content-center my-5 "><br>
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg ">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <center>
                                            <div class="col-md-12 col-sm-8"> <br><BR> 
                                                <h4 class="">Login</h4>
                                                <hr>
                                                <p class="text-success text-center">Faça o login , para acessa o sistema.</p>
                                                <form method="post" action="inserts/insteLogin.php">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                            </div>
                                                            <input name="login" class="form-control" placeholder="login" type="text">
                                                        </div>                                                     
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                            </div>
                                                            <input class="form-control" placeholder="******" name="senha" type="password">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <button type="submit" class="btn btn-primary "> Login </button>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </div> 
                            </div>

                        </div>

                    </div>

                </div>
            </div>


            <?php ?>