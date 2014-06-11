from django.shortcuts import render_to_response
from resume.models import resume_experience


def index(request):
    return render_to_response('resume/resume.html', {
        'jobs': resume_experience.objects.all().order_by('id')
        })
