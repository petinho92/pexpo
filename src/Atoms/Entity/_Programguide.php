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
 * @property-read \Atomino\Bundle\Attachment\Collection $hu_pg
 * @property-read \Atomino\Bundle\Attachment\Collection $en_pg
 * @property-read \Atomino\Bundle\Attachment\Collection $stand
 * @method static \Atomino\Carbon\Database\Finder\Comparison active($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison attachments($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @property-read \DateTime|null $created
 * @method static \Atomino\Carbon\Database\Finder\Comparison date($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison en_type($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison hu_type($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison name($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison updated($isin = null)
 * @property-read \DateTime|null $updated
 * @method static \Atomino\Carbon\Database\Finder\Comparison year($isin = null)
 * @method static \Application\Atoms\EntityHelper\_Programguide_FINDER search( Filter $filter = null )
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
#[Validator("date", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("date", \Atomino\Carbon\Field\StringField::class)]
#[Validator("en_type", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("en_type", \Atomino\Carbon\Field\StringField::class)]
#[Validator("hu_type", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("hu_type", \Atomino\Carbon\Field\StringField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("name", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>20])]
#[Field("name", \Atomino\Carbon\Field\StringField::class)]
#[Field("updated", \Atomino\Carbon\Field\DateTimeField::class)]
#[Field("year", \Atomino\Carbon\Field\IntField::class)]
abstract class _Programguide extends Entity implements \Atomino\Bundle\Attachment\AttachmentableInterface{
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Created\CreatedTrait;
	use \Atomino\Carbon\Plugins\Updated\UpdatedTrait;
	use \Atomino\Carbon\Plugins\Attachment\AttachmentableTrait;
	protected final function __getPicture(){return $this->getAttachmentCollection("picture");}
	protected final function __getHu_pg(){return $this->getAttachmentCollection("hu_pg");}
	protected final function __getEn_pg(){return $this->getAttachmentCollection("en_pg");}
	protected final function __getStand(){return $this->getAttachmentCollection("stand");}
	const active = 'active';
	public bool|null $active = null;
	const attachments = 'attachments';
	protected array $attachments = [];
	const created = 'created';
	protected \DateTime|null $created = null;
	protected function getCreated():\DateTime|null{ return $this->created;}
	const date = 'date';
	public string|null $date = null;
	const en_type = 'en_type';
	public string|null $en_type = null;
	const hu_type = 'hu_type';
	public string|null $hu_type = null;
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const name = 'name';
	public string|null $name = null;
	const updated = 'updated';
	protected \DateTime|null $updated = null;
	protected function getUpdated():\DateTime|null{ return $this->updated;}
	const year = 'year';
	public int|null $year = null;
}





