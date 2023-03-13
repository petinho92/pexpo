<?php namespace Application\Missions\Admin\Api;

use Application\Entity\Contact;
use Application\Entity\User;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\Entity;
use Atomino\Gold\Gold;
use Atomino\Gold\Goldify;
use Atomino\Gold\ItemApi;
use Atomino\Gold\ListApi;
use Atomino\Gold\ListSorting;
use Atomino\Gold\ListView;

#[Goldify(Contact::class, User::ROLE_WEBMASTER)]
class ContactApi extends Gold{
    protected function listApi(): ListApi
    {
        return new class($this, 10, false) extends ListApi {
            public function views(): array
            {
                return [
                    new ListView("All", fn() => null),
                    new ListView("Active", fn() => Filter::where(Contact::active(true))),
                    new ListView("Inactive", fn() => Filter::where(Contact::active(false|null))),
                ];
            }

            public function sortings(): array
            {
                return [
                    new ListSorting("name", fn($asc) => $asc ? [[Contact::lastname, "asc"]] : [[Contact::lastname, "desc"]]),
                ];
            }

            public function export(Entity|Contact $item): array
            {
                $data = parent::export($item);
                $data['picture'] = $item->picture->first?->image->crop(64,64)->png;
                return $data;
            }

            public function searchFilter(array $filter): Filter|null
            {
                return Filter::where(isset($filter['lastname']) && $filter['lastname'] ? Contact::lastname()->instring($filter['lastname']) : null);
            }

            public function quickSearchFilter(string $search): Filter
            {
                return Filter::where(Contact::lastname()->instring($search))
                    ->or(Contact::id($search));
            }
        };
    }

    protected function itemApi(): ItemApi
    {
        return new class($this) extends ItemApi {
            protected function options(Entity|null $item): array|null
            {
                return null;
            }
            protected function export(Entity|Contact $item): array
            {
                return parent::export($item);
            }
            protected function update(Entity|Contact $item, array $data): int|null
            {
                return parent::update($item, $data);
            }
        };
    }
}
