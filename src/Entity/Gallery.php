<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Gallery;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 50, mimetype: "/image\/.*/")]
#[Validator('name', NotBlank::class)]
#[Validator('category', NotBlank::class)]
#[Validator('alt', NotBlank::class)]
#[Validator('year', NotBlank::class)]
#[Modelify(\Application\Database\DefaultConnection::class, 'gallery', true)]
class Gallery extends _Gallery{

}