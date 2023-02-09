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
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison event($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison date($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison room($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison phase($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison qrcode($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @method static \Application\Atoms\EntityHelper\_Eventlog_FINDER search( Filter $filter = null )
 */
#[RequiredField('id', \Atomino\Carbon\Field\IntField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Validator("event", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>50])]
#[Field("event", \Atomino\Carbon\Field\StringField::class)]
#[Field("date", \Atomino\Carbon\Field\DateField::class)]
#[Validator("room", \Symfony\Component\Validator\Constraints\Length::class, ['max'=>40])]
#[Field("room", \Atomino\Carbon\Field\StringField::class)]
#[Field("phase", \Atomino\Carbon\Field\IntField::class)]
#[Field("qrcode", \Atomino\Carbon\Field\IntField::class)]
#[Field("created", \Atomino\Carbon\Field\DateTimeField::class)]
abstract class _Eventlog extends Entity {
	static null|Model $model = null;
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const event = 'event';
	public string|null $event = null;
	const date = 'date';
	public \DateTime|null $date = null;
	const room = 'room';
	public string|null $room = null;
	const phase = 'phase';
	public int|null $phase = null;
	const qrcode = 'qrcode';
	public int|null $qrcode = null;
	const created = 'created';
	public \DateTime|null $created = null;
}





