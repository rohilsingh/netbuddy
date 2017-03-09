<div id="side_bar">
    <?php include_once('query.php'); ?>
    <div id="side_bar_a" onclick="chat_redirect()"><br>CHAT</div>
    <div id="side_bar_b" onclick="home_redirect()"><br><?php $x=current_user($connect); echo $x; ?></div>
    <div id="side_bar_c" onclick="friend_zone_redirect()"><br>FRIEND ZONE</div>
    <div id="side_bar_d" onclick="settings_redirect()"><br>SETTINGS</div>
</div>
