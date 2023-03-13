<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Contact;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;
use Symfony\Component\Validator\Constraints\NotBlank;


#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 1, maxSize: 1024 * 1024, mimetype: "/image\/.*/")]
#[Validator("lastname", NotBlank::class)]
#[Validator("firstname", NotBlank::class)]
#[Validator("email", NotBlank::class)]
#[Validator("major_hu", NotBlank::class)]
#[Validator("major_en", NotBlank::class)]
#[Modelify(\Application\Database\DefaultConnection::class, 'contact', true)]
class Contact extends _Contact{

}