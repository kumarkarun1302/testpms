<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// THIS HAS TO GO FIRST IN THE post_controller_constructor HOOK LIST.
$hook['post_controller_constructor'][] = array( // Mind the "[]", this is not the only post_controller_constructor hook
  'class'    => 'CSRF_Protection',
  'function' => 'validate_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
 
// Generates the token (MUST HAPPEN AFTER THE VALIDATION HAS BEEN MADE, BUT BEFORE THE CONTROLLER
// IS EXECUTED, OTHERWISE USER HAS NO ACCESS TO A VALID TOKEN FOR CUSTOM FORMS).
$hook['post_controller_constructor'][] = array( // Mind the "[]", this is not the only post_controller_constructor hook
  'class'    => 'CSRF_Protection',
  'function' => 'generate_token',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
 
// This injects tokens on all forms
$hook['display_override'] = array(
  'class'    => 'CSRF_Protection',
  'function' => 'inject_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);

$hook['post_controller_constructor'] = array(
  'class' => 'LanguageLoader',
  'function' => 'initialize',
  'filename' => 'LanguageLoader.php',
  'filepath' => 'hooks'
);

/*$hook['post_controller_constructor'][] = array(
    'class' => 'Track_Visitor',
    'function' => 'visitor_track',
    'filename' => 'Track_Visitor.php',
    'filepath' => 'hooks'
);*/