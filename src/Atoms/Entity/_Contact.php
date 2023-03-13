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
 * @method static \Atomino\Carbon\Database\Finder\Comparison active($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison attachments($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @property-read \DateTime|null $created
 * @method static \Atomino\Carbon\Database\Finder\Comparison email($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison firstname($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison lastname($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison major_en($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison major_hu($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison mobile($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison prefix($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison section_en($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison section_hu($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison telephone($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison updated($isin = null)
 * @property-read \DateTime|null $updated
 * @method static \Application\Atoms\EntityHelper\_Contact_FINDER search( Filter $filter = null )
 */
#[RequiredField('id', \Atomino\Carbon\Field\IntField::class)]
#[Immutable("created", true)]
#[Protect("created", true, false)]
#[RequiredField("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Protect("updated", true, false)]
#[RequiredField("updated", \Atomino\Carbon\Field\DateTimeField::class)]
#[Immutable( 'attachments', true )]
#[Protect( 'attachments', false, false )]
#[RequiredField( 'attachments', \Atomino\Carbon\Field\JsonField::class )]
#[Field("active", \Atomino\Carbon\Field\BoolField::class)]
#[Field("attachments", \Atomino\Carbon\Field\JsonField::class)]
#[Field("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Validator("email", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("email", \Atomino\Carbon\Field\StringField::class)]
#[Validator("firstname", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("firstname", \Atomino\Carbon\Field\StringField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("lastname", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("lastname", \Atomino\Carbon\Field\StringField::class)]
#[Field("major_en", \Atomino\Carbon\Field\JsonField::class)]
#[Field("major_hu", \Atomino\Carbon\Field\JsonField::class)]
#[Validator("mobile", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>30])]
#[Field("mobile", \Atomino\Carbon\Field\StringField::class)]
#[Validator("prefix", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>20])]
#[Field("prefix", \Atomino\Carbon\Field\StringField::class)]
#[Validator("section_en", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("section_en", \Atomino\Carbon\Field\StringField::class)]
#[Validator("section_hu", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("section_hu", \Atomino\Carbon\Field\StringField::class)]
#[Validator("telephone", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>30])]
#[Field("telephone", \Atomino\Carbon\Field\StringField::class)]
#[Field("updated", \Atomino\Carbon\Field\DateTimeField::class)]
abstract class _Contact extends Entity implements \Atomino\Bundle\Attachment\AttachmentableInterface{
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Created\CreatedTrait;
	use \Atomino\Carbon\Plugins\Updated\UpdatedTrait;
	use \Atomino\Carbon\Plugins\Attachment\AttachmentableTrait;
	protected final function __getPicture(){return $this->getAttachmentCollection("picture");}
	const active = 'active';
	public bool|null $active = null;
	const attachments = 'attachments';
	protected array $attachments = [];
	const created = 'created';
	protected \DateTime|null $created = null;
	protected function getCreated():\DateTime|null{ return $this->created;}
	const email = 'email';
	public string|null $email = null;
	const firstname = 'firstname';
	public string|null $firstname = null;
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const lastname = 'lastname';
	public string|null $lastname = null;
	const major_en = 'major_en';
	public array $major_en = [];
	const major_hu = 'major_hu';
	public array $major_hu = [];
	const mobile = 'mobile';
	public string|null $mobile = null;
	const prefix = 'prefix';
	public string|null $prefix = null;
	const section_en = 'section_en';
	public string|null $section_en = null;
	const section_hu = 'section_hu';
	public string|null $section_hu = null;
	const telephone = 'telephone';
	public string|null $telephone = null;
	const updated = 'updated';
	protected \DateTime|null $updated = null;
	protected function getUpdated():\DateTime|null{ return $this->updated;}
}





