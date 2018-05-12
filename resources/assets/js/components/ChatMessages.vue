<template>

    <ul class="chat">
        <div class="scroll">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                        {{ message.created_at }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
        </div>

    </ul>
</template>

<script>

    export default {
    props: ['messages']
  };

</script>