<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Content;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;

#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 5, mimetype: "/image\/.*/")]
#[AttachmentCollection(field: "files", maxCount: 5, mimetype: "/application\/pdf/")]
#[Modelify(\Application\Database\DefaultConnection::class, 'content', true)]
class Content extends _Content{

}