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
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison name($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison star($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison location($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison hu_type($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison en_type($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison hu_desc($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison en_desc($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison hu_services($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison en_services($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison telephone($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison email($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison website($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison maps($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison active($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison attachments($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @property-read \DateTime|null $created
 * @method static \Atomino\Carbon\Database\Finder\Comparison updated($isin = null)
 * @property-read \DateTime|null $updated
 * @method static \Application\Atoms\EntityHelper\_Accommodation_FINDER search( Filter $filter = null )
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
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("name", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("name", \Atomino\Carbon\Field\StringField::class)]
#[Validator("star", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>5])]
#[Field("star", \Atomino\Carbon\Field\StringField::class)]
#[Validator("location", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("location", \Atomino\Carbon\Field\StringField::class)]
#[Validator("hu_type", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("hu_type", \Atomino\Carbon\Field\StringField::class)]
#[Validator("en_type", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("en_type", \Atomino\Carbon\Field\StringField::class)]
#[Validator("hu_desc", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>65535])]
#[Field("hu_desc", \Atomino\Carbon\Field\StringField::class)]
#[Validator("en_desc", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>65535])]
#[Field("en_desc", \Atomino\Carbon\Field\StringField::class)]
#[Field("hu_services", \Atomino\Carbon\Field\JsonField::class)]
#[Field("en_services", \Atomino\Carbon\Field\JsonField::class)]
#[Validator("telephone", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>30])]
#[Field("telephone", \Atomino\Carbon\Field\StringField::class)]
#[Validator("email", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("email", \Atomino\Carbon\Field\StringField::class)]
#[Validator("website", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("website", \Atomino\Carbon\Field\StringField::class)]
#[Validator("maps", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("maps", \Atomino\Carbon\Field\StringField::class)]
#[Field("active", \Atomino\Carbon\Field\BoolField::class)]
#[Field("attachments", \Atomino\Carbon\Field\JsonField::class)]
#[Field("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Field("updated", \Atomino\Carbon\Field\DateTimeField::class)]
abstract class _Accommodation extends Entity implements \Atomino\Bundle\Attachment\AttachmentableInterface{
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Created\CreatedTrait;
	use \Atomino\Carbon\Plugins\Updated\UpdatedTrait;
	use \Atomino\Carbon\Plugins\Attachment\AttachmentableTrait;
	protected final function __getPicture(){return $this->getAttachmentCollection("picture");}
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const name = 'name';
	public string|null $name = null;
	const star = 'star';
	public string|null $star = null;
	const location = 'location';
	public string|null $location = null;
	const hu_type = 'hu_type';
	public string|null $hu_type = null;
	const en_type = 'en_type';
	public string|null $en_type = null;
	const hu_desc = 'hu_desc';
	public string|null $hu_desc = null;
	const en_desc = 'en_desc';
	public string|null $en_desc = null;
	const hu_services = 'hu_services';
	public array $hu_services = [];
	const en_services = 'en_services';
	public array $en_services = [];
	const telephone = 'telephone';
	public string|null $telephone = null;
	const email = 'email';
	public string|null $email = null;
	const website = 'website';
	public string|null $website = null;
	const maps = 'maps';
	public string|null $maps = null;
	const active = 'active';
	public bool|null $active = null;
	const attachments = 'attachments';
	protected array $attachments = [];
	const created = 'created';
	protected \DateTime|null $created = null;
	protected function getCreated():\DateTime|null{ return $this->created;}
	const updated = 'updated';
	protected \DateTime|null $updated = null;
	protected function getUpdated():\DateTime|null{ return $this->updated;}
}





