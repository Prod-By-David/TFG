<style>
.navBar{
    background-color: #B01B00;
    height: 45px;
    color: #fff;
    position: relative;
    margin-bottom: 30px;
}
.navBar-options{
    line-height: 45px;
    height: 45px;
    padding: 0;
    transition: all .3s ease-in-out;
    display: flex;
    justify-content: space-between;
}
.navBar-options .fa-exchange-alt,
.navBar-options-list{
    line-height: 45px;
    height: 45px;
    margin: 0;
    padding: 0;
}
.navBar-options .fa-exchange-alt{
    width: 40px;
    left: 0;
    font-size: 23px;
    cursor: pointer;
    user-select: none;
    text-align: center;
    outline: none;
    margin-left: 9px;
}
.navBar-options-list{
    right: 9px;
}
.navBar-options-list .noLink{
    cursor: inherit;
}
.navBar-options-list ul{
    height: 45px;
    display: flex;
}
.navBar-options-list ul li{
    height: 45px;
    line-height: 45px;
    cursor: pointer;
    padding: 0 7px;
    font-size: 21px;
    user-select: none;
}
.navBar-options-list ul li{ outline: none; }
.navBar-options-list ul li a,
.navBar-options-list ul li img{
    margin: 0;
    padding: 0;
    padding-top: 0;
    margin-top: 0;
    box-sizing: border-box;
    color: #FFF;
}
.navBar-options-list ul li img{
    border: 1px solid #E1E1E1;
    border-radius: 50%;
    width: 39px;
    height: 39px;
    margin-top: 3px;
    margin-bottom: 0;
}
</style>

<div class="full-width navBar">
    <div class="full-width navBar-options">
        <i class="fas fa-exchange-alt fa-fw" id="btn-menu"></i> 
        <nav class="navBar-options-list">
            <ul class="list-unstyle">
                <li class="text-condensedLight noLink" >
                    <a class="btn-exit" href="<?php echo APP_URL."logOut/"; ?>" >
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
                <li class="text-condensedLight noLink" >
                    <small><?php echo $_SESSION['usuario']; ?></small>
                </li>
                <li class="noLink">
                    <?php
                        if(is_file("./app/views/fotos/".$_SESSION['foto'])){
                            echo '<img class="is-rounded img-responsive" src="'.APP_URL.'app/views/fotos/'.$_SESSION['foto'].'">';
                        }else{
                            echo '<img class="is-rounded img-responsive" src="'.APP_URL.'app/views/fotos/default.png">';
                        }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</div>