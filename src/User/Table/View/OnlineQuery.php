<?php namespace Anomaly\UsersModule\User\Table\View;

use Carbon\Carbon;
use Illuminate\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OnlineQuery
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table\View
 */
class OnlineQuery
{

    /**
     * Handle the query.
     *
     * @param Builder $query
     */
    public function handle(Builder $query, Guard $auth)
    {
        $query
            ->where('id', '!=', $auth->id())
            ->where('last_activity_at', '>=', (new Carbon())->subMinute(5)->toDateTimeString())
            ->orderBy('last_activity_at', 'DESC');
    }
}
