#!/bin/sh

LOGFILE=$HOME/cp-legacy-files-log.txt
if [ ! -f $LOGFILE ]; then
  touch $LOGFILE
fi

DOWNLOADS=$HOME/Downloads
LOCAL_LEGACY_FILE_LIST=$HOME/Sites/svv/cp-legacy-files-list.txt
LOCAL_LEGACY_SOURCE=$HOME/Sites/drupal7_a2h/sites/svv/files
LOCAL_LEGACY_DESTINATION=$HOME/Sites/svv/web/legacy
REMOTE_LEGACY_SOURCE=$HOME/Sites/drupal7_a2h/sites/svv/files
REMOTE_LEGACY_DESTINATION=/home/doesborg/public_html/svv/web/legacy/images

TIME=$(date +%s)

while read F  ; do
        echo $F
        scp -P 7822 "$LOCAL_LEGACY_SOURCE/$F" doesborg@doesb.org:$REMOTE_LEGACY_DESTINATION
done < $LOCAL_LEGACY_FILE_LIST

#if scp $DOWNLOADS/*.torrent boris@luque:/home/boris/Torrents ; then
##    echo "Command succeeded"
#    echo "$TIME torrents moved" >> $LOGFILE
    #rm -rf $DOWNLOADS/*.torrent

#scp -p 7822 docroot/mac.sql doesborg@doesb.org:/tmp

#else
#    echo "Command failed"
#    echo "$TIME torrents move failed" >> $LOGFILE
#fi

#scp ~/Downloads/*.torrent boris@luque:/home/boris/Torrents

