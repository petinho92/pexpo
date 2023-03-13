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
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @property-read \DateTime|null $created
 * @method static \Atomino\Carbon\Database\Finder\Comparison date($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison event($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison phase($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison qrcode($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison room($isin = null)
 * @method static \Application\Atoms\EntityHelper\_Eventlog_FINDER search( Filter $filter = null )
 */
#[RequiredField('id', \Atomino\Carbon\Field\IntField::class)]
#[Immutable("created", true)]
#[Protect("created", true, false)]
#[RequiredField("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Field("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Validator("date", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>30])]
#[Field("date", \Atomino\Carbon\Field\StringField::class)]
#[Validator("event", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("event", \Atomino\Carbon\Field\StringField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("phase", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("phase", \Atomino\Carbon\Field\StringField::class)]
#[Validator("qrcode", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>100])]
#[Field("qrcode", \Atomino\Carbon\Field\StringField::class)]
#[Validator("room", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>40])]
#[Field("room", \Atomino\Carbon\Field\StringField::class)]
abstract class _Eventlog extends Entity {
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Created\CreatedTrait;
	const created = 'created';
	protected \DateTime|null $created = null;
	protected function getCreated():\DateTime|null{ return $this->created;}
	const date = 'date';
	public string|null $date = null;
	const event = 'event';
	public string|null $event = null;
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const phase = 'phase';
	public string|null $phase = null;
	const qrcode = 'qrcode';
	public string|null $qrcode = null;
	const room = 'room';
	public string|null $room = null;
}





