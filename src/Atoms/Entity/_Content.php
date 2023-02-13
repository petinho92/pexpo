<?php namespace Application\Atoms\Entity;

use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\Attributes\Field;
use Atomino\Carbon\Attributes\Immutable;
use Atomino\Carbon\Attributes\Protect;
use Atomino\Carbon\Attributes\Validator;
use Atomino\Carbon\Entity;
use Atomino\Carbon\Model;
use Atomino\Carbon\Attributes\RequiredField;


/**
 * @property-read \Atomino\Bundle\Attachment\Collection $picture
 * @property-read \Atomino\Bundle\Attachment\Collection $files
 * @method static \Atomino\Carbon\Database\Finder\Comparison active($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison attachments($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison category($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison content_en($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison content_hu($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison name($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison page($isin = null)
 * @method static \Application\Atoms\EntityHelper\_Content_FINDER search( Filter $filter = null )
 */
#[RequiredField('id', \Atomino\Carbon\Field\IntField::class)]
#[Immutable( 'attachments', true )]
#[Protect( 'attachments', false, false )]
#[RequiredField( 'attachments', \Atomino\Carbon\Field\JsonField::class )]
#[Field("active", \Atomino\Carbon\Field\BoolField::class)]
#[Field("attachments", \Atomino\Carbon\Field\JsonField::class)]
#[Validator("category", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("category", \Atomino\Carbon\Field\StringField::class)]
#[Validator("content_en", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>4294967295])]
#[Field("content_en", \Atomino\Carbon\Field\StringField::class)]
#[Validator("content_hu", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>4294967295])]
#[Field("content_hu", \Atomino\Carbon\Field\StringField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("name", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>200])]
#[Field("name", \Atomino\Carbon\Field\StringField::class)]
#[Validator("page", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("page", \Atomino\Carbon\Field\StringField::class)]
abstract class _Content extends Entity implements \Atomino\Bundle\Attachment\AttachmentableInterface{
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Attachment\AttachmentableTrait;
	protected final function __getPicture(){return $this->getAttachmentCollection("picture");}
	protected final function __getFiles(){return $this->getAttachmentCollection("files");}
	const active = 'active';
	public bool|null $active = null;
	const attachments = 'attachments';
	protected array $attachments = [];
	const category = 'category';
	public string|null $category = null;
	const content_en = 'content_en';
	public string|null $content_en = null;
	const content_hu = 'content_hu';
	public string|null $content_hu = null;
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const name = 'name';
	public string|null $name = null;
	const page = 'page';
	public string|null $page = null;
}





