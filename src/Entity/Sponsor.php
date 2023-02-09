<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Sponsor;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;


#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 1, mimetype: "/image\/.*/")]
#[Modelify(\Application\Database\DefaultConnection::class, 'sponsor', true)]
class Sponsor extends _Sponsor
{

}