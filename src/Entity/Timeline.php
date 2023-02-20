<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Timeline;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Atomino\Carbon\Plugins\Created\Created;
use Atomino\Carbon\Plugins\Updated\Updated;
use Atomino\Carbon\Validation\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Created]
#[Updated]
#[Attachmentable()]
#[AttachmentCollection(field: "picture", maxCount: 1, mimetype: "/image\/.*/")]
#[Validator("year", NotBlank::class)]
#[Validator("hu_title", NotBlank::class)]
#[Validator("en_title", NotBlank::class)]
#[Validator("hu_desc", NotBlank::class)]
#[Validator("en_desc", NotBlank::class)]
#[Validator(null, UniqueEntity::class, ['fields'=>['year']])]
#[Modelify(\Application\Database\DefaultConnection::class, 'timeline', true)]
class Timeline extends _Timeline{

}