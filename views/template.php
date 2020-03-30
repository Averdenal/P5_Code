<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="stylesheet" href="<?= CSS ?>etabs.css">
    <title><?= $titlePage ?></title>
</head>
<body>
    <header class="header">
        <div class="header_Action">
            <div class="logo"></div>
            <div class="header_Text">Getting Out Again</div>
        </div>
        <div class="header_Action">
            <div></div>
            <nav class="navigation">
                <ul class="menu_Main">
                    <li class="menu_Main_Item"><a href="#" class="menu_Main_Item_Link icons" id="link_Sub_Menu"></a></li>
                    <li class="menu_Main_Item"><a href="#" class="menu_Main_Item_Link">HOME</a></li>
                    <li class="menu_Main_Item"><a href="#" class="menu_Main_Item_Link">HOME</a></li>
                    <li class="menu_Main_Item"><a href="#" class="menu_Main_Item_Link">...</a></li>
                </ul>
            </nav>
        </div>
        <div class="header_Action">
            <div class="interactive_Input">
                <input type="text">
                <div class="interactive_Input_Icon_Wrap icons search_Icon"></div>
            </div>
            
        </div>
        <div class="header_Action">
            <div class="progress_Stat">
                <div class="bar-progress-wrap">
                    <p class="bar-progress-info">Next: <span class="bar-progress-text">38<span class="bar-progress-unit">exp</span></span></p>
                </div>
                <div id="logged-user-level" class="progress-stat-bar" style="width: 110px; height: 4px; position: relative;">
                    <canvas width="110" height="4" style="position: absolute;top: 0px;left: 0px;background-color: #f0f8ff73;"></canvas>
                    <canvas width="80" height="4" style="position: absolute;top: 0px;left: 0px;background-color: #7fff0099;"></canvas>
                </div>
            </div>
            <div class="info_Lvl"><p>Level</p><Span>3</Span></div>
        </div>
        <div class="header_Action">
            <div class="action-list">
                <div class="action-list-item icons" id="market"></div>
                <div class="action-list-item icons" id="friends"></div>
                <div class="action-list-item icons" id="messages"></div>
                <div class="action-list-item icons" id="notifs"></div>
            </div>
            <div>
                <div class="action-item icons" id="param"></div>
            </div>
        </div>
    </header>

    <aside class="sidebar left">
        <div class="avatar">
            <span class="onligne"></span>
            <img src="<?= IMAGES ?>avatars/avatar02.jpg" alt="" srcset="">
            <span class="lvl_avatar">15</span>
        </div>
        <div class="menu small">
            <button class="menu_Item"><span class="icons" id="newsfeed"></span></button>
            <button class="menu_Item"><span class="icons" id="bar"></span></button>
            <button class="menu_Item"><span class="icons" id="Groups"></span></button>
            <button class="menu_Item"><span class="icons" id="members"></span></button>
            <button class="menu_Item"><span class="icons" id="badges"></span></button>
            <button class="menu_Item"><span class="icons" id="quests"></span></button>
            <button class="menu_Item"><span class="icons" id="events"></span></button>
        </div>
    </aside>
    <div class="content-grid">
        <?php include('viewEtab.php') ?>
    </div>
    <aside class="sidebar right">
        
    </aside>

    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>