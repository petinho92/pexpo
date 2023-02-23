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
 * @method static \Atomino\Carbon\Database\Finder\Comparison counter($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison created($isin = null)
 * @property-read \DateTime|null $created
 * @method static \Atomino\Carbon\Database\Finder\Comparison id($isin = null)
 * @property-read int|null $id
 * @method static \Atomino\Carbon\Database\Finder\Comparison registration($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison social($isin = null)
 * @method static \Atomino\Carbon\Database\Finder\Comparison updated($isin = null)
 * @property-read \DateTime|null $updated
 * @method static \Application\Atoms\EntityHelper\_Config_FINDER search( Filter $filter = null )
 */
#[RequiredField('id', \Atomino\Carbon\Field\IntField::class)]
#[Immutable("created", true)]
#[Protect("created", true, false)]
#[RequiredField("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Protect("updated", true, false)]
#[RequiredField("updated", \Atomino\Carbon\Field\DateTimeField::class)]
#[Field("counter", \Atomino\Carbon\Field\JsonField::class)]
#[Field("created", \Atomino\Carbon\Field\DateTimeField::class)]
#[Field("id", \Atomino\Carbon\Field\IntField::class)]
#[Protect("id", true, false)]
#[Immutable("id",false)]
#[Field("registration", \Atomino\Carbon\Field\JsonField::class)]
#[Field("social", \Atomino\Carbon\Field\JsonField::class)]
#[Field("updated", \Atomino\Carbon\Field\DateTimeField::class)]
abstract class _Config extends Entity {
	static null|Model $model = null;
	use \Atomino\Carbon\Plugins\Created\CreatedTrait;
	use \Atomino\Carbon\Plugins\Updated\UpdatedTrait;
	const counter = 'counter';
	public array $counter = [];
	const created = 'created';
	protected \DateTime|null $created = null;
	protected function getCreated():\DateTime|null{ return $this->created;}
	const id = 'id';
	protected int|null $id = null;
	protected function getId():int|null{ return $this->id;}
	const registration = 'registration';
	public array $registration = [];
	const social = 'social';
	public array $social = [];
	const updated = 'updated';
	protected \DateTime|null $updated = null;
	protected function getUpdated():\DateTime|null{ return $this->updated;}
}





