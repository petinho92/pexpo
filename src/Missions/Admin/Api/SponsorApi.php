<?php namespace Application\Missions\Admin\Api;

use Application\Entity\Sponsor;
use Application\Entity\User;
use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Carbon\Entity;
use Atomino\Gold\Gold;
use Atomino\Gold\Goldify;
use Atomino\Gold\ItemApi;
use Atomino\Gold\ListApi;
use Atomino\Gold\ListSorting;
use Atomino\Gold\ListView;

#[Goldify(Sponsor::class, User::ROLE_WEBMASTER)]
class SponsorApi extends Gold{
    protected function listApi(): ListApi
    {
        return new class($this, 10, false) extends ListApi{
            public function views(): array
            {
                return [
                    new ListView("All", fn()=> null),
                    new ListView("Active", fn() => Filter::where(Sponsor::active(true))),
                    new ListView("Inactive", fn() => Filter::where(Sponsor::active(false|null)))
                ];
            }
            public function sortings(): array
            {
                return [
                    new ListSorting("name", fn($asc) => $asc ? [[Sponsor::name, "asc"]] : [[Sponsor::name, "desc"]]),
                ];
            }
            public function export(Entity|Sponsor $item): array
            {
                $data = parent::export($item);
                $data['picture'] = $item->picture->first?->image->crop(64,64)->png;
                return $data;
            }
            public function searchFilter(array $filter): Filter|null
            {
                return Filter::where(isset($filter['name']) && $filter['name'] ? Sponsor::name()->instring($filter['name']) : null);
            }

            public function quickSearchFilter(string $search): Filter
            {
                return Filter::where(Sponsor::name()->instring($search))
                    ->or(Sponsor::id($search));
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
            protected function export(Entity|Sponsor $item): array
            {
                return parent::export($item);
            }
            protected function update(Entity|Sponsor $item, array $data): int|null
            {
                return parent::update($item, $data);
            }

        };
    }

}
