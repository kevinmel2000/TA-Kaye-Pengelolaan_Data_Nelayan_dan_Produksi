
<div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="index.php">
                    </div>
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">

                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="assets/layouts/layout/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> 

                                        <?php 
                                            $username = $_SESSION['username'];
                                            include "../connect.php";
                                            $sql = "select * from verifikasi_user where username='".$username."'";
                                            $query = mysql_query($sql);
                                            while($data = mysql_fetch_array($query)){
                                            echo $data['username'];
                                        } ?>
                                    </span>
                                </a>
                            </li>
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="index.php">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>