<?php

$messagesNewCounter = R::count('messages', ' status = ?', ['new']);
