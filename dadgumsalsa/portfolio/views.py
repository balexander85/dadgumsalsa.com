# Create your views here.
from portfolio.models import daily_balances
from django.shortcuts import render_to_response


chea = 'oof!'


def index(request):
    return render_to_response('portfolio/index.html', {
        'entries': daily_balances.objects.all().order_by('log_date').reverse()[:7]
    })
