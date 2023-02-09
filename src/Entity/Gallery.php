<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Gallery;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;

#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: 'picture', mimetype: "/image\/.*/")]
#[Modelify(\Application\Database\DefaultConnection::class, 'gallery', true)]
class Gallery extends _Gallery{

}