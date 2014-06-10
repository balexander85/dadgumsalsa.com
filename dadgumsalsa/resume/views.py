# Create your views here.
from resume.models import resume_experience
from django.shortcuts import render_to_response


def index(request):
    return render_to_response('resume/resume.html', {
        'jobs': resume_experience.objects.all().order_by('job_id').reverse(),
    })

