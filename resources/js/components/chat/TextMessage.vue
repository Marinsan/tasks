<template>
    <div :class="{ 'mb-3 message message-right':this.owner, 'mb-3 message message-left':!this.owner }">
        <span></span>
        <div class="message-in tail">
            <span class="tail-container"></span>
            <span class="tail-container highlight"></span>
            <div>
                <div role="">
                    <span dir="auto" class="message-author">{{ this.author }}</span>
                </div>
                <div class="message-body">
                    <div>
                        <span dir="ltr">{{ this.message }}</span>
                    </div>
                </div>
                <div class="message-time">
                    <div>
                        <span>{{ this.time }}</span>
                    </div>
                </div>
            </div>
            <span></span>
        </div>
    </div>
</template>

<script>
export default {
  name: 'TextMessage',
  props: {
    author: {
      type: String,
      default: ''
    },
    owner: {
      type: Boolean,
      default: false
    },
    message: {
      type: String,
      required: true
    },
    time: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>
    .message{
        border-radius: 7.5px;
        box-shadow: 0 1px 0.5px rgba(0, 0, 0, 0.13);
        max-width: 65%;
        font-size: 14.2px;
        line-height: 19px;
        color: #262626;
        position: relative;
        background-color: #ffffff;
        min-width: 10%;
    }
    .tail-container {
        content: '';
        position: absolute;
        top: 0px;
        width: 20px;
        height: 19px;
    }
    .message-left .tail-container {
        left: -20px;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAmCAMAAADp2asXAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAACQUExURUxpccPDw9ra2m9vbwAAAAAAADExMf///wAAABoaGk9PT7q6uqurqwsLCycnJz4+PtDQ0JycnIyMjPf3915eXvz8/E9PT/39/RMTE4CAgAAAAJqamv////////r6+u/v7yUlJeXl5f///5ycnOXl5XNzc/Hx8f///xUVFf///+zs7P///+bm5gAAAM7Ozv///2fVensAAAAvdFJOUwCow1cBCCnqAhNAnY0WIDW2f2/hSeo99g1lBYT87vDXG8/6d8oL4sgM5szrkgl660OiZwAAAHRJREFUKM/ty7cSggAABNFVUQFzwizmjPz/39k4YuFWtm55bw7eHR6ny63+alnswT3/rIDzUSC7CrAziPYCJCsB+gbVkgDtVIDh+DsE9OTBpCtAbSBAZSEQNgWIygJ0RgJMDWYNAdYbAeKtAHODlkHIv997AkLqIVOXVU84AAAAAElFTkSuQmCC);
    }
    .message-right .tail-container {
        right: -17px;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAmCAMAAADp2asXAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAADAUExURUxpcXmHa4maet/4yA0aDRMTE8fhsgAAAAAAAMDXrCsxJeX/z1xzXIiYetPsvGBsVUdPPuH8zOH8zNDrvMvmtrrOpwAAAAAAABUVFRoaGtnyxLTMozQ+MMfftFBeSR8nH5aoh6q/mW9+ZN/4yMjhtRwlHAAAAIOWd+r/06C1kkNLOwsLC9z4xur/0+n/0t76x9v4xeL9y+b/z+j/0d/7yeH8yuX/zeD8ytz5xt76yOP/zeH+y+b/zuD8yd35xuf/0MY9jkkAAAAsdFJOUwBvd/ATDZIBAsMp/At/11c9yPbizHoICQwT4bY1ykkgjahl6s8bBYT6nUAWOLbtFAAAAIhJREFUKM/tzbUWwlAURNFBE9zdg0NecLf//yvKUJyUdDnl7HXXletXqmXl9wPbQ9JCcC+VJsOj2mDwovzj3osjHGNFEVxNRAj7UR1hlx+I4FbuC8HkZBE8OwnRxamdFsEmUxCCGdoI51RLBK9xVwTvjyMEbzlDMJMp7lqseNc8YNc6CGyF/a0vcmwhZbCG+kEAAAAASUVORK5CYII=);
    }
    .message-author{
        color: #ef6b6b !important;
        display: flex;
        font-size: 12.8px;
        font-weight: 500;
        line-height: 22px;
    }
    .message.message-left{
        float: left;
        text-align: left;
        border-top-left-radius: 0px;
        margin-right: 55%;
    }
    .message.message-right{
        float: right;
        text-align: left;
        background-color: #dcf8c6;
        border-top-right-radius: 0px;
        margin-left: 55%;
    }
    .message-right .message-author{
        display: none;
    }
    .message-body{
        position: relative;
        white-space: pre-wrap;
        word-wrap: break-word;
        padding-right: 30px;
    }
    .message-in{
        padding: 6px 7px 8px 9px;
    }
    .message-time{
        float: right;
        margin: -10px 0 -5px 4px;
        color: rgba(0, 0, 0, 0.45);
        font-size: 11px;
        height: 15px;
        line-height: 15px;
        white-space: nowrap;
    }
</style>
