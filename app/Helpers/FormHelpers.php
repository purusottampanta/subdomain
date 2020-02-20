<?php


/**
 * @param        $route
 * @param        $title
 * @param        $text
 * @param string $class
 * @param string $iclass
 * @param string $value
 * @return string
 */
function getDeleteForm($route, $title, $text, $class = 'btn btn-icon-toggle', $iclass = 'fa fa-trash', $value = '')
{
    $token = csrf_field();
    $field = method_field('DELETE');

    return <<<HTML
    <a class="confirm-delete $class" type='button' data-title="$title" data-text='$text'>
        <i class="$iclass opacity-75"></i> $value
    </a>
    <form action="$route" method='post' style="display:none;" class="delete-form">
        $token
        $field
    </form>
    
HTML;
}


function getUpdateButton($route, $title, $text, $class = 'btn btn-icon-toggle', $iclass = 'fa fa-trash', $value = '')
{
    $token = csrf_field();
    $field = method_field('PATCH');

    return <<<HTML
    <a class="confirm-delete $class" type='button' data-title="$title" data-text='$text'>
            <i class="$iclass"></i>
            $value
        </a>
    <form action = "$route" method ='post' style="display:none;" class="delete-form">
        $token
        $field
    </form>
HTML;
}


/**
 * @param        $route
 * @param        $title
 * @param        $text
 * @param        $label
 * @param string $class
 * @return string
 */
function getSwalConfirmDialog($route, $title, $text, $label, $class = '', $data = null)
{
    return <<<HTML
    <a data-href="$route" data-title="$title" data-text="$text" class="swal-alert {$class}" data-formdata=$data>$label</a>
HTML;
}