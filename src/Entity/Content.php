<?php namespace Application\Entity;

use Atomino\Carbon\Attributes\Modelify;
use Application\Atoms\Entity\_Content;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Plugins\Attachment\Attachmentable;
use Atomino\Carbon\Plugins\Attachment\AttachmentCollection;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Attachmentable()]
#[AttachmentCollection(field: 'picture', maxCount: 5, mimetype: "/image\/.*/")]
#[AttachmentCollection(field: "files", maxCount: 5, mimetype: "/application\/pdf/")]
#[Validator("name", NotBlank::class)]
#[Validator("page", NotBlank::class)]
#[Validator("category", NotBlank::class)]
#[Validator("content_hu", NotBlank::class)]
#[Validator("content_en", NotBlank::class)]
#[Modelify(\Application\Database\DefaultConnection::class, 'content', true)]
class Content extends _Content{

}