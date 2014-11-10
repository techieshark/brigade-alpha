<?php

    //
    // What kind of request is this?
    //
    $is_specific_brigade = ($_GET['source'] == 'brigade' && $_GET['brigade_url']) ? true : false;
    $is_organizer = (!$is_specific_brigade && $_GET['source'] == 'organizer') ? true : false;
    $is_generic = (!$is_specific_brigade && !$is_organizer) ? true : false;

    //
    // Get information about the selected brigade, if there is one.
    //
    if($is_specific_brigade) {
        $brigade_info = json_decode(file_get_contents($_GET['brigade_url']), true);
    
    } else {
        $brigade_info = null;
    }

    include('top.php');
    $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

?>

<div class="layout-semibreve">

<? if($is_specific_brigade) { ?>

  <div id="brigade_text">
    <p><b>Thanks for signing up for <?= $brigade_info['name'] ?>.</b></p>
    <p><a href="<?= $brigade_info['events_url'] ?>"><?= $brigade_info['website'] ?></a></p>
    <p>You should join <?= $brigade_info['name'] ?>’s Meetup and check out their upcoming events:</p>
    <p><a href="<?= $brigade_info['events_url'] ?>"><?= $brigade_info['events_url'] ?></a></p>
    <p>Thanks again and see you soon.</p>
    <br>
    <p><i>Brielle Plump - Communities Coordinator</i></p>
    <p><a href='mailto:brielle@codeforamerica.org'>brielle@codeforamerica.org</a></p>
  </div>

<? } elseif($is_organizer) { ?>

  <div id="organizer_text">
    <p><b>Thanks for signing up to organize in your community.</b></p>
    <p>The next step for you and your team is to watch the recorded Hangout, which walks you through the initial process of starting a Brigade.
    <p><a href='https://www.youtube.com/watch?v=f1oBpGQbdmg'>Click here to view the video.</a></p>
    
    <p>After you watch the video, please </p>
    <p><a href='https://docs.google.com/a/codeforamerica.org/forms/d/1eQ8WVDj3TIz4wQrM8zk4DN1PLst6Nro5RtZI88xJ2gI/edit?usp=sharing'>fill out this survey so we can share resources with you!</a></p>
    <p>Please reach out to us if you have any questions, and have fun as you start building you civic-tech community! 
    Thanks again and talk to you soon.</p>
    <br>
    <p><i>Brielle Plump - Communities Coordinator</i></p>
    <p><a href='mailto:brielle@codeforamerica.org'>brielle@codeforamerica.org</a></p>
  </div>

<? } else { ?>

  <div id="no_brigade_text">
    <p><b>Thanks for your interest in the Code for America Brigade community.</b></p>
    <p>We will add you to our mailing list so you can keep stay up to date with both local opportunities and national events.</p>
    <p>If you want to reconsider leading a Brigade in your city,  
    <p><a href='https://www.youtube.com/watch?v=f1oBpGQbdmg'>Click here to view the "How to start a Brigade" video.</a></p>
    <p>Good luck and we'll be in touch.</p>
    <br>
    <p><i>Brielle Plump - Communities Coordinator</i></p>
    <p><a href='mailto:brielle@codeforamerica.org'>brielle@codeforamerica.org</a></p>
  </div>

<? } ?>

</div>

<? include('bottom.php') ?>
