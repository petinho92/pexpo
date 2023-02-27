<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Accommodation;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 1, mimetype: "/image\/.*/")]

#[Modelify(\Application\Database\DefaultConnection::class, 'accommodation', true)]
#[Validator('name', NotBlank::class)]
#[Validator('location', NotBlank::class)]
#[Validator('hu_type', NotBlank::class)]
#[Validator('en_type', NotBlank::class)]
#[Validator('discount', NotBlank::class)]
#[Validator('hu_desc', NotBlank::class)]
#[Validator('en_desc', NotBlank::class)]
#[Validator('telephone', NotBlank::class)]
#[Validator('email', NotBlank::class)]
#[Validator('website', NotBlank::class)]
#[Validator('maps', NotBlank::class)]
class Accommodation extends _Accommodation{

}