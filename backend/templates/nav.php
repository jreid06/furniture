<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top admin-nav" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- <img src="/assets/general/idyl_original_logo.png" alt="idyl logo" width="80" height="45" style="margin-top:2px; padding-left: 15px;" @click="dashhome"> -->
        <p class="text-center"> <span class="fa fa-home" @click="dashhome"></span></p>

    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->


    <div class="navbar-default sidebar admin-nav" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    /input-group
                </li> -->
                <li>
                    <a href="/backend/auth/admin/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <template v-for="(nav,index) in navigation.pages">
                            <li class="nav-list-li">
                                <template v-if="nav.sublinks">
                                    <a :href="nav.link" style="background-color: darkgray; font-weight: bold; color: #222">{{nav.title}}</a>
                                    <ul class="nav nav-third-level">
                                        <template v-if="nav.title.toLowerCase() == 'edit product images'">
                                            <?php

                                                for ($i=0; $i < count($__DASHBOARD_product_categories); $i++) {
                                                    echo "<li class=\"nav-list-li\">";
                                                    echo "<a href='/backend/auth/admin/edit/products/".$__DASHBOARD_product_categories[$i]['slug']."'>".ucwords($__DASHBOARD_product_categories[$i]['title'])." Products</a>";
                                                    echo "</li>";
                                                }

                                             ?>
                                        </template>
                                        <template v-else>
                                            <li class="nav-list-li" v-for="(sublink, index) in nav.sublinks_list">
                                                <a :href="sublink.link">{{sublink.title}}</a>
                                            </li>
                                        </template>
                                    </ul>
                                </template>
                                <template v-else>
                                    <a :href="nav.link">{{nav.title}}</a>
                                </template>
                            </li>

                        </template>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="/backend/pages/login.html">Login Page</a>
                        </li>
                    </ul>
                    /.nav-second-level
                </li> -->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
