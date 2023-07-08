<?php

/**
 * Index file for the samples.
 */
\error_reporting(E_ALL);

include_once 'Kernel/bootstrap.php';
?>

<?php if (!isWebRequest()) { ?>
  To view this example, run the following command from the root directory of this repository:

  php -S localhost:8000 -t examples/

  And then browse to "localhost:8000" in your web browser
  <?php return; ?>
<?php } ?>

<?php echo pageHeader('🗃️ WebDon Notion API Samples - Webmardi'); ?>

  <h2>Resources</h2>

  <ul>
    <li><a href="./resources/events.php">Fetching all events</a></li>
    <li><a href="resources/past_events.php">Fetching all past events</a></li>
    <li><a href="resources/future_events.php">Fetching all future events</a></li>
    <li><a href="resources/next_event.php">Fetching the next event</a></li>
    <li><a href="resources/event.php">Fetching one event</a></li>
  </ul>

<?php echo pageFooter(); ?>
