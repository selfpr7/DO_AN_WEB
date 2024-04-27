<?php
$pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:"";
$coid=isset($_REQUEST['coid'])?$_REQUEST['coid']:"";
$uid=isset($_REQUEST['uid'])?$_REQUEST['uid']:"";
$coContent=isset($_REQUEST['coContent'])?$_REQUEST['coContent']:"";
switch ($action) {
    case 'addComment':
        $comment->addComment($uid,$pid,$coContent);
        header("Location: ../DO_AN_WEB/index.php?controller=Product&action=detail&pid=$pid");
        break;
    case 'deleteComment':
        $comment->deleteComment($coid);
        header("Location: ../DO_AN_WEB/index.php?controller=Product&action=detail&pid=$pid");
        break;
    case 'updateComment';
        $comment->updateComment($coid,$coContent);
        header("Location: ../DO_AN_WEB/index.php?controller=Product&action=detail&pid=$pid");
        break;
    case 'list';
        break;
    default:
        # code...
        break;
}
?>