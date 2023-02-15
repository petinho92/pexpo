<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Programguide;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;
use Symfony\Component\Validator\Constraints\NotBlank;


#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: "picture", maxCount: 1, mimetype: "/image\/.*/")]
#[AttachmentCollection(field: "files", maxCount: 2, mimetype: "/application\/pdf/")]
#[Validator("name", NotBlank::class)]
#[Validator("date", NotBlank::class)]
#[Validator("hu_type", NotBlank::class)]
#[Validator("en_type", NotBlank::class)]

#[Modelify(\Application\Database\DefaultConnection::class, 'programguide', true)]
class Programguide extends _Programguide{

}