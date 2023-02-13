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
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison name($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison updated($isin = null)
 * @property-read \DateTime|null $updated
 * @method static \Atomino\Carbon\Database\Finder\Comparison website($isin = null)
 * @method static \Application\Atoms\EntityHelper\_Sponsor_FINDER search( Filter $filter = null )
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
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("name", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("name", \Atomino\Carbon\Field\StringField::class)]
#[Field("updated", \Atomino\Carbon\Field\DateTimeField::class)]
#[Validator("website", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("website", \Atomino\Carbon\Field\StringField::class)]
abstract class _Sponsor extends Entity implements \Atomino\Bundle\Attachment\AttachmentableInterface{
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
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const name = 'name';
	public string|null $name = null;
	const updated = 'updated';
	protected \DateTime|null $updated = null;
	protected function getUpdated():\DateTime|null{ return $this->updated;}
	const website = 'website';
	public string|null $website = null;
}





