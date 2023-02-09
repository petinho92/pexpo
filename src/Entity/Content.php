<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Content;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;

#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 1, maxSize: 1920 * 1080, mimetype: "/image\/.*/")]
#[Modelify(\Application\Database\DefaultConnection::class, 'content', true)]
class Content extends _Content{

}