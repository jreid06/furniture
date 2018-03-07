<?php
    include '../scripts/dbconnect.php';
    include "../backend/templates/header.php";

 ?>

<body>

    <div id="wrapper" class="dash-vue">

        <?php include "../backend/templates/nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <h4>Key</h4>
                    <hr>
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" style="background-color: #F5F5F5"><a href="#">GENERAL</a></li>
                        <li role="presentation" style="background-color: #dff0d8"><a href="#">EDIT</a></li>
                        <li role="presentation" style="background-color: #D9EDF7"><a href="#">HELP</a></li>
                    </ul>
                    <hr>
                    <br>
                    <br>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">

            </div>

            <div class="row">
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>{{status}}</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <template v-for="(panel, index) in dashboardhome.panels">

                    <template v-if="panel.multiple_links">
                        <template v-for="(sublinks, index) in panel.link">
                            <div class="col-lg-4 col-md-4">
                                <div :class="'panel '+panel.className">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-edit fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-center">
                                                <div><h4>{{panel.title}}</h4></div>
                                                <div>{{sublinks.category}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a :href="sublinks.link">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </template>
                    </template>

                    <template v-else>
                        <div class="col-lg-4 col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-edit fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-center">
                                            <div><h4>{{panel.title}}</h4></div>
                                        </div>
                                    </div>
                                </div>
                                <a :href="panel.link">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </template>

                </template>


            </div>
            <!-- /.row -->
            <div class="row">

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../backend/templates/footer.php' ?>

</body>

</html>
