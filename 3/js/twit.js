JQTWEET = {
    // Set twitter username, number of tweets & id/class to append tweets
    user: 'quenesswebblog',
    numTweets: 5,
    appendTo: '#tweets',
    appendTopRight:'#topRight',
    myClick: function(){
        $("#left div").click(function(){
           $(this).addClass('active');
           var value = $(this).text(); 
           JQTWEET.user = value;
           console.log(JQTWEET.user);
           JQTWEET.loadTweets();
           $("#right").text('');
           $("#right").append('<div id="topRight"></div><div id="tweets"></div>');
           $("#left").text('');
        });
    },
    getXML:function(){
    $.ajax({
        url: 'users.xml',
        type: 'GET',
        dataType: 'xml',
        timeout: 1000,
        error: function () {
            alert('Error loading XML document');
        },
        success: function(xml)
        {
          $("#left").append("<p class='user'>USERS</p>");
          $(xml).find("user").each(function() {
            var res = $(this).find('name').text(); // Discription content
            $("#left").append("<div>"+res+"</div><hr>");
          });
          JQTWEET.myClick();
        }
    });
    },
    // core function of jqtweet
    loadTweets: function() {
      JQTWEET.getXML();
        $.ajax({
            url: 'http://api.twitter.com/1/statuses/user_timeline.json/',
            type: 'GET',
            dataType: 'jsonp',
            data: {
                screen_name: JQTWEET.user,
                include_rts: true,
                count: JQTWEET.numTweets,
                include_entities: true
            },
            success: function(data, textStatus, xhr) {
                var html = '<div class="tweet"><img src="IMMY">TWEET_TEXT<div class="time">AGO</div>';
                var topRightMy = '<div style="height:85px"><img src="IMMY1"></div><div style="text-align:center"><a href="https://twitter.com/'+JQTWEET.user+'">Профіль користувача</a></div>';
                 // append tweets into page
                $(JQTWEET.appendTopRight).append(topRightMy.replace('IMMY1',data[0].user.profile_image_url.replace('normal','bigger')));
                 for (var i = 0; i < data.length; i++) {
                    $(JQTWEET.appendTo).append(
                        html.replace('TWEET_TEXT', '<div class="text">'+JQTWEET.ify.clean(data[i].text)+'</div>')
                            .replace(/USER/g, data[i].user.screen_name)
                            .replace('AGO', JQTWEET.timeAgo(data[i].created_at) )
                            .replace(/ID/g, data[i].id_str)
                            .replace('IMMY',data[i].user.profile_image_url)
                    );
                 }
                 
            }  
        });
    },

    timeAgo: function(dateString) {
        var rightNow = new Date();
        var then = new Date(dateString);
         
        if ($.browser.msie) {
            // IE can't parse these crazy Ruby dates
            then = Date.parse(dateString.replace(/( \+)/, ' UTC$1'));
        }
 
        var diff = rightNow - then;
 
        var second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24,
        week = day * 7;
 
        if (isNaN(diff) || diff < 0) {
            return ""; // return blank string if unknown
        }
 
        if (diff < second * 2) {
            // within 2 seconds
            return "щойно";
        }
 
        if (diff < minute) {
            return Math.floor(diff / second) + " секунд тому";
        }
 
        if (diff < minute * 2) {
            return "хвилину тому";
        }
 
        if (diff < hour) {
            return Math.floor(diff / minute) + " хвилин тому";
        }
 
        if (diff < hour * 2) {
            return "годину тому";
        }
 
        if (diff < day) {
            return  Math.floor(diff / hour) + " годин тому";
        }
 
        if (diff > day && diff < day * 2) {
            return "вчора";
        }
 
        if (diff < day * 365) {
            return Math.floor(diff / day) + " днів тому";
        }
 
        else {
            return "більше року тому";
        }
    }, // timeAgo()
     
     
    /**
      * The Twitalinkahashifyer!
      * http://www.dustindiaz.com/basement/ify.html
      * Eg:
      * ify.clean('your tweet text');
      */
    ify:  {
      link: function(tweet) {
        return tweet.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|$))/g, function(link, m1, m2, m3, m4) {
          var http = m2.match(/w/) ? 'http://' : '';
          return '<a class="twtr-hyperlink" target="_blank" href="' + http + m1 + '">' + ((m1.length > 25) ? m1.substr(0, 24) + '...' : m1) + '</a>' + m4;
        });
      },
 
      at: function(tweet) {
        return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20})/g, function(m, username) {
          return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/intent/user?screen_name=' + username + '">@' + username + '</a>';
        });
      },
 
      list: function(tweet) {
        return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20}\/\w+)/g, function(m, userlist) {
          return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/' + userlist + '">@' + userlist + '</a>';
        });
      },
 
      hash: function(tweet) {
        return tweet.replace(/(^|\s+)#(\w+)/gi, function(m, before, hash) {
          return before + '<a target="_blank" class="twtr-hashtag" href="http://twitter.com/search?q=%23' + hash + '">#' + hash + '</a>';
        });
      },
 
      clean: function(tweet) {
        return this.hash(this.at(this.list(this.link(tweet))));
      }
    } // ify
};
    
$(document).ready(function () {
    // start jqtweet!
    JQTWEET.loadTweets();
});