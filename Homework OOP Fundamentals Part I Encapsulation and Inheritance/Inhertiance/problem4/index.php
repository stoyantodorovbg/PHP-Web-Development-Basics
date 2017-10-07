<?php

include 'DB.php';
include 'Song.php';

$songsCount = trim(intval(fgets(STDIN)));
$db = new DB();
for ($i = 0; $i < $songsCount; $i++) {
    $line = trim(fgets(STDIN));
    $lineArr = explode(';', $line);
    $song = new Song($lineArr[0], $lineArr[1], $lineArr[2]);
    $db->setPlayList($song);
}

echo 'Songs added: '.$db->getSongsCount()."\n";
echo 'Playlist length: '.$db->getTrackLength()[0].'h '.$db->getTrackLength()[1].'m '.$db->getTrackLength()[2].'s';
